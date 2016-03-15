<?php
namespace App\Http\Controllers\Auth;
use App\OAuthIdentity;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\User;
class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function redirectToAuthenticationServiceProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from authentication service provider.
     *
     * @return Response
     */
    public function handleAuthenticationServiceProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/' . $provider);
        }
//       dd($user);
        $authUser = $this->findOrCreateUser($user , $provider);
        Auth::login($authUser, true);
        return Redirect::to('home');
    }
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($providerUser, $provider)
    {
        if ($authUser = $this->userExistsByProviderUserId($providerUser))
            return $authUser;
        return $this->createUser($providerUser, $provider);
    }
    private function createUser($providerUser, $provider){
        if (! $user = $this->userExistsByEmail($providerUser)) {
            $user = $this->newUser();
            foreach (['name','email','avatar'] as $item) {
                $user->$item = $providerUser->$item;
            }
            $user->save();
        }
        $oAuthIdentity = new OAuthIdentity();
        $oAuthIdentity->provider_user_id = $providerUser->getId();
        $oAuthIdentity->provider = $provider;
        $oAuthIdentity->access_token = $providerUser->token;
        $oAuthIdentity->user_id = $user->id;
        $oAuthIdentity->avatar = $providerUser->getAvatar();
        $oAuthIdentity->name = $providerUser->getName();
        $oAuthIdentity->nickname = $providerUser->getNickname();
        $oAuthIdentity->save();
        return $user;
    }
    private function newUser()
    {
        $user_model = Config::get('sergi-socialite.model');
        return new $user_model;
    }
    private function userExistsByProviderUserId($providerUser)
    {
        /** @var OAuthIdentity $provUser */
        if ( $provUser = OAuthIdentity::where('provider_user_id', $providerUser->id)->first()) {
            return $provUser->user;
        }
        return false;
    }
    private function userExistsByEmail($providerUser)
    {
        if ( $user = User::where('email', $providerUser->email)->first()) {
            return $user;
        }
        return false;
    }
}