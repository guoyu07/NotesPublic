## Category 目录
*   [Access Tokens](#AccessTokens)
## Access Tokens <a id="AccessTokens"></a>
[Facebook Access Tokens](https://developers.facebook.com/docs/facebook-login/access-tokens)

### User Access Token
### App Access Token
```
GET /oauth/access_token?
    app_id={app-id}
    & app_secret={app-secret}
    & grant_type=client_credential
```
    
Response

```json
{
    "access_token" : "ACCESS_TOKEN},
    "expires_in" : 7200             // Wechat keeps it alive for 7200 sec
}
```

Therefore, this API call should only be made using server-side code.
Again, for security, app access token should never be hard-coded into client-side code

There is another method to make calls API that doesn't require using a generated app access token
```
GET /api?access_token={app-id}|{app-secret}
```

### Page Access Token
### Client Token
