<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 7/03/16
 * Time: 17:59
 */

namespace App;


trait OAuthIdentities
{
    /**
     * Get OAuth identities
     */
    public function oauthIdentities()
    {
        return $this->hasMany(OAuthIdentity::class);
    }
}