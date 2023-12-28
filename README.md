# Simple Registration Page for TrinityCore/AzerothCore/AshamaneCore/CMangos

Create a versatile website for your game server with this easy-to-use script, featuring compatibility with major server cores.

Supported Cores: 
- [AzerothCore](http://azerothcore.org)
- [TrinityCore](http://TrinityCore.org)
- [AshamaneCore](https://github.com/AshamaneProject/AshamaneCore/)
- [CMangos](https://github.com/cmangos/)

⭐ If you liked the project, feel free to give it a shining star. ⭐

## Prerequisites

Ensure PHP version 8.0 or higher is installed and the following extensions are enabled:

- [GMP Extension](https://www.php.net/manual/en/book.gmp.php)
- [GD Extension](https://www.php.net/manual/en/book.image.php)
- [Soap Extension](https://www.php.net/manual/en/book.soap.php)
- [Mbstring Extension](https://www.php.net/manual/en/book.mbstring.php)
- [PDO Extension](https://www.php.net/manual/en/book.pdo.php)
- [PDO-MySQL Extension](https://www.php.net/manual/en/ref.pdo-mysql.php)

## Installation Guide (Last version - PHP 8)

1. Fulfill the above prerequisites on your server.

2. Obtain the project files:
   - Download and unzip the project, or clone it using Git:
     ```
     git clone https://github.com/masterking32/WoWSimpleRegistration
     ```
  
3. Navigate to the `application/config/` directory and rename the file `config.php.sample` to `config.php`.

4. Edit the newly renamed `config.php` file, inserting your server details. Note that if using the "Image Captcha" feature, PHP's GD2 module must be enabled.

5. Once configuration is complete, your registration page should be operational.

## PHP 7 Version Download

For those requiring PHP 7 support, please use the [last compatible commit for PHP 7](https://github.com/masterking32/WoWSimpleRegistration/tree/32a1e7e6bc31f2ed6ed1d83f64d1ae62aeab9d32). Follow these steps to clone the repository at the specific commit:

```sh
git clone https://github.com/masterking32/WoWSimpleRegistration
cd WoWSimpleRegistration
git checkout 32a1e7e6bc31f2ed6ed1d83f64d1ae62aeab9d32
```

# Debugging

Encountering a blank page can be a common issue, typically indicating a hidden error that needs to be diagnosed. To facilitate troubleshooting, enable `debug_mode` in the configuration file.

Here’s how to enable debug mode:
- Open the `config.php` file.
- Locate the `$config['debug_mode']` parameter.
- Set it to `true` to enable debug mode.

⚠️ **Important: Remember to disable debug mode** once you have resolved the issues. Debug mode should be set to `false` before deploying the website in a production environment or going live. This helps to ensure security and performance are not compromised.

## Features

1. **Registration Page**: Accommodating a wide range of game versions including Vanilla, TBC, WotLK, MoP, WoD, Legion, and BFA.
2. **Online Players Status**: Check who's online at the server, with support for multiple realms.
3. **Leaderboards**: Display top players based on Playtime, Kills, Honor Points, Arena Points, and Arena Teams across different realms.
4. **Connection Guide**: Step-by-step ‘How to connect’ page for new players.
5. **Contact Form**: Accessible ‘Contact us’ page for inquiries and support.
6. **Multiple Themes**: Choose from various templates such as Light, Icecrown, Kaelthas, Advance, and Battle for Azeroth.
7. **Password Management**: Facilities to change (as of April 10, 2019) and recover passwords (as of May 31, 2019).
8. **Vote System**: Engage your community with a voting system (added on April 3, 2020).
9. **Captcha Integration**: Protect your site with HCaptcha/Recaptcha v2 (since July 27, 2020).
10. **Two-Factor Authentication (2FA)**: Add an extra layer of security with 2FA (introduced on July 28, 2020).
11. **Multilingual Support**: Making the site accessible to a global audience with support for various languages (added on September 10, 2020), including:
    - 🇬🇧 English
    - 🇮🇷 Persian
    - 🇮🇹 Italian
    - 🇨🇳 Chinese Simplified
    - 🇹🇼 Chinese Traditional
    - 🇸🇪 Swedish
    - 🇫🇷 French
    - 🇩🇪 German
    - 🇪🇸 Spanish
    - 🇰🇷 Korean
    - 🇷🇺 Russian

## Changelog

### 2.0.2 (2/24/2021)
- Added a language changer feature. (Thanks to [DuelistRag3](https://github.com/DuelistRag3))

### 2.0.1 (2/20/2021)
- Introduced SRP6 support for CMangos.

### 2.0.0 (8/03/2020)
- New Battle for Azeroth template added.

### 1.9.9 (8/03/2020)
- Multi-language support introduced.

### 1.9.8 (8/03/2020)
- Implemented SRP6 support.

### 1.9.7 (7/28/2020)
- Added Two-Factor Authentication (2FA) support.
- Patched a low-level security vulnerability. **(Important: Please upgrade to this version)**
- Resolved various bugs.
- Included the `account set addon` command as a post-registration step for SOAP registrations.

### 1.9.6 (7/27/2020)
- Added HCaptcha/Recaptcha/Image captcha support.
- Enhanced page load performance.
- Expanded descriptions within the config file for better clarity.
- Updated composer packages.

### 1.9.5 (4/17/2020)
- Enabled Register/Restore Password feature via SOAP, with CMangos support.

### 1.9.4 (4/03/2020)
- Vote system feature added.

### 1.9.3 (4/02/2020)
- Introduced a new template.

### 1.9.2 (3/31/2020)
- Fixed reported issues.

### 1.9.1 (3/12/2020)
- Added PHP version check.

### 1.9 (3/12/2020)
- Allowed multiple accounts to share one email address for non-battle.net servers.
- Changed the user identification method from email to username for password change and restoration features on non-battle.net servers.
- Added the option to enable or disable the display of top players and online players.

## Screenshots

### Advance Template
![Advance Template Screenshot](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/a-bfa-min.jpg)

### Battle for Azeroth Template
![Battle for Azeroth Template Screenshot](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/b1.jpg)

### Light Template
![Light Template Register Page Screenshot](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/1.jpg)

### IceCrown Template
![IceCrown Template Home Page Screenshot](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/i1.jpg)

### Kael'thas Template
![Kael'thas Template Home Page Screenshot](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/k1.jpg)

Looking for more visuals? [Browse additional screenshots here.](https://github.com/masterking32/WoWSimpleRegistration/tree/master/screenshots)

## Credits

### Programming
- **Lead Developer**: [Amin.MasterkinG](https://masterking32.com)

### Translations
- **English/Persian**: [Amin.MasterkinG](https://github.com/masterking32)
- **Italian**: [Helias](https://github.com/helias)
- **Chinese Simplified/Traditional**: [Coolzoom](https://github.com/coolzoom), [oiuv](https://github.com/oiuv)
- **Swedish**: [Kitzunu](https://github.com/Kitzunu)
- **French**: [Kalorte](https://github.com/Kalorte)
- **German**: [DuelistRag3](https://github.com/DuelistRag3)
- **Spanish**: [xjose93](https://github.com/xjose93)
- **Korean**: [KOREAFTP](https://github.com/KOREAFTP)
- **Russian**: [Haeniken](https://github.com/Haeniken)

Heartfelt thanks to all the contributors for their invaluable support and contributions to this project.