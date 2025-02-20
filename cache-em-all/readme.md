Difficulty: Easy

Description:
We've discovered a vulnerable login system that caches user sessions in an interesting way. Our intel suggests there's a highly privileged user named 'saitama' with access to restricted areas of the system. While we have credentials for regular users (john:password123 and jane:securepass456), accessing saitama's account is crucial for obtaining the flag.

Key Information:
- The system implements a caching mechanism where logged-in users' information is stored
- Once cached, users can log in with any password