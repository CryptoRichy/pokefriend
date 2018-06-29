<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use App\User;

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
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();
            $create['facebook_token'] = $user->token;
            $create['avatar'] = $user->getAvatar();

            //Check is user created
            $user_model = User::where("facebook_id" , $create['facebook_id'])->first();
            if(!$user_model){
                $user_model = User::create($create);
            }

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
