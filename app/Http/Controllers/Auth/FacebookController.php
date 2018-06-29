<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use App\User;
use File;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        //$socialUser = Socialite::driver('facebook')->fields(['id', 'email', 'cover', 'name', 'first_name', 'last_name', 'age_range', 'link', 'gender', 'locale', 'picture', 'timezone', 'updated_time', 'verified', 'birthday', 'friends', 'relationship_status', 'significant_other','context','taggable_friends'])->scopes(['user_friends'])->user();
        return Socialite::driver('facebook')->scopes(['user_friends'])->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            //Check is user created
            $user_model = User::where("facebook_id" , $user->getId())->first();
            if(!$user_model){
                //Create new user
                $create['name'] = $user->getName();
                $create['email'] = $user->getEmail();
                $create['facebook_id'] = $user->getId();

                // //Get avatar image and save into public/avatars/{md5(facebook_id)}.jpg
                $fileContents = file_get_contents($user->getAvatar());
                File::put(public_path() . '/avatars/' . md5($user->getId()) . ".jpg", $fileContents);
                $create['avatar'] = md5($user->getId());
                $create['facebook_token'] = $user->token;
                $user_model = User::create($create);
            }else{
                $user_model->facebook_token = $user->token;
            }

            //Update this user's Facebook token
            $user_model->last_login = date("Y-m-d H:i:s");
            $user_model->save();

            Auth::login($user_model,true);

            //測試Facebook 好友list讀取
            $fb = new \Facebook\Facebook([
                'app_id' => config('services.facebook.client_id'),
                'app_secret' => config('services.facebook.client_secret'),
                'default_graph_version' => 'v3.0',
            ]);

            try {
                $response = $fb->get('/'.$user->getId()."/friends?limit=1", $user->token);
            } catch(\Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(\Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            $edge = $response->getGraphEdge();

            $keep = true;
            while($keep){
                foreach ($edge as $one) {
                    $user = $one->asArray();
                    echo $user['id'].":".$user['name']."<br>";
                }
    
                $edge = $fb->next($edge);
                
                if(empty($edge)){
                    $keep = false;
                }
            }
        } catch (Exception $e) {
            
            echo $e->getMessage();
        }
    }
}
