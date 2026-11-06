# Laboratory Activity Submission: Laravel 13 Secure API

- **Name:** Joemarie Q. Uberita
- **Course / Section:** ITE 315 - Integrative Programming & Technologies II
- **Repository URL:** https://github.com/juberita-droid/laravel13-secure-api-lab

## Screenshots Checklist
- 01-public-api-200.png
- 02-register-201.png
- 03-login-200.png
- 04-profile-no-token-401.png
- 05-profile-with-token-200.png
- 06-invalid-login-422.png
- 07-logout-200.png
- 08-revoked-token-401.png

## Short Reflection
A 401 Unauthorized response indicates that the request lacks valid authentication credentials (such as an invalid, expired, or missing token). In contrast, a successful authenticated profile response validates the bearer token against Sanctum's personal access tokens table and returns the associated user data. Once logout is executed, the current access token is deleted from the database, immediately rendering subsequent requests with that same token invalid and resulting in a 401 Unauthorized response.
