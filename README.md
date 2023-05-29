
# Simple Register Page for TrinityCore/AzerothCore/AshamaneCore/CMangos

With this script, You can make a website for your game server.

Support : [AzerothCore](http://azerothcore.org), [TrinityCore](http://TrinityCore.org), [AshamaneCore](https://github.com/AshamaneProject/AshamaneCore/), [CMangos](https://github.com/cmangos/).


## Requirement : PHP >= 7.0

Enable **[gmp](https://www.google.com/search?client=firefox-b-d&q=enable%20gmp%20extension%20php%207)**, **[gd](https://www.google.com/search?client=firefox-b-d&q=enable%20gd%20extension%20php%207)**, **[soap](https://www.google.com/search?client=firefox-b-d&q=enable%20soap%20extension%20php%207)**, **[mbstring](https://www.google.com/search?client=firefox-b-d&q=enable%20mbstring%20extension%20php%207)**, **[pdo](https://www.google.com/search?client=firefox-b-d&q=enable%20pdo%20extension%20php%207)** and **[pdo-mysql](https://www.google.com/search?client=firefox-b-d&q=enable%20pdo-mysql%20extension%20php%207)**.

# Installation

- Install requirments.
 - Download project & unzip.
 - Go to `application/config/` folder and change `config.php.sample` file name to `config.php`
 - Open the config file and set your server data. If the "Image Captcha" type is used, then the GD2 module for PHP must be installed.
 - Enjoy that.

# Debug

If you got a blank screen, You can enable `debug_mode` in the config file.

## Features

 1. Register Page (Support Vanilla/TBC/WotLK/MoP/WoD/Legion/BFA)
 2. Online Players Status (Multi-Realm support).
 3. Show TOPs by Playtime, Kills, Honor Point, Arena Point, and Arena Team (Multi-Realm support).
 4. How to connect Page.
 5. Contact us page.
 6. Multiple templates (Light, Icecrown, Kaelthas, Advance, Battle for Azeroth).
 7. Change Password (4/10/2019).
 8. Restore Password (5/31/2019).
 9. Vote System (4/03/2020).
 10. Support HCaptcha/Recaptcha v2 (7/27/2020).
 11. Support Two-Factor Authentication (2FA) (7/28/2020).
 12. **Multi-Language support** (9/10/2020) (Support: 🇬🇧 English, 🇮🇷 Persian, 🇮🇹 Italian, 🇨🇳 Chinese-simplified, 🇹🇼 Chinese-traditional, 🇸🇪 Swedish, 🇫🇷 French, 🇩🇪 German, 🇪🇸 Spanish, 🇰🇷 Korean, 🇷🇺 Russian).

## Changelogs

 **2.0.2 (2/24/2021):**
 1. Language changer added. (Thanks to [DuelistRag3](https://github.com/DuelistRag3))
 
 **2.0.1 (2/20/2021):**
 1. Support SRP6 for CMangos.
 
  **2.0.0 (8/03/2020):**
 1. Added Battle for Azeroth template.
 
 **1.9.9 (8/03/2020):**
 1. Multi-Language support.
 
 **1.9.8 (8/03/2020):**
 1. Support SRP6.
 
  **1.9.7 (7/28/2020):**
 1. Support Two-Factor Authentication (2FA)
 2. Fixed a low-level vulnerability. (UPDATE TO THIS VERSION)
 3. Fixed some of the bugs.
 3. Allow running `account set addon` command after registration. (SOAP registration)
 
 **1.9.6 (7/27/2020):**
 1. Support HCaptcha/Recaptcha/Image captcha.
 2. Fixed page load speed!
 3. Add more description for the config file.
 3. Update composer packages.
 
 **1.9.5 (4/17/2020):**
 1. Register/Restore Password via SOAP. (Support CMangos)
 
 **1.9.4 (4/03/2020):**
 1. Vote Added.
 
 **1.9.3 (4/02/2020):**
 1. Added a new template.

 **1.9.2 (3/31/2020):**
 1. Fixed some of the issues.

 **1.9.1 (3/12/2020):**
 1. Check the PHP version.
 
 **1.9 (3/12/2020):**
 1. Allow using an email for multiple accounts. (For non-battle.net servers)
 2. Replace Email to username for change password and restore password. (For non-battle.net servers)
 3. Add an option to enable or disable top players and online players.

## Screenshots

## Advance Template

![Advance](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/a-bfa-min.jpg)

## Battle for Azeroth

![BFA](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/b1.jpg)

## Light Template

![Register Page](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/1.jpg)

## IceCrown Template

![Home Page](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/i1.jpg)
## Kael'thas Template

![Home Page](https://raw.githubusercontent.com/masterking32/WoWSimpleRegistration/master/screenshots/k1.jpg)

Need more screenshots? [Check here](https://github.com/masterking32/WoWSimpleRegistration/tree/master/screenshots)

## Programmers

Author : [Amin.MasterkinG](https://masterking32.com)


## Translate

English/Persian by [Amin.MasterkinG](https://github.com/masterking32)

Italian by [Helias](https://github.com/helias)

Chinese-simplified/Chinese-traditional by [Coolzoom](https://github.com/coolzoom)

Swedish by [Kitzunu](https://github.com/Kitzunu)

French by [Kalorte](https://github.com/Kalorte)

German by [DuelistRag3](https://github.com/DuelistRag3)

Spanish by [xjose93](https://github.com/xjose93)

Korean by [KOREAFTP](https://github.com/KOREAFTP)

Russian by [Haeniken](https://github.com/Haeniken)
