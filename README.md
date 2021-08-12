# moodle-block_telegram_forum

INSTALLATION WITH GIT

1) Go to block directory.

2) Execute "git clone https://github.com/marceloschmitt/moodle-block_telegram_forum.git telegram_forum".

3) Configure the plugin as administrator:
  - Create a Telegram account for the organization where Moodle is installed or use its own (https://telegram.org or download Telegram APP in cell phone).
  - Create a Telegram Bot and take note of its token and its name  (https://core.telegram.org/bots, item 6).
  - Set the Token of Telegram bot created for the organization.
  - Set the name of Telegram bot created for the organization

4) Voilá. Now each teacher that wants to integrate ther course foruns with Telegram must configure in each course:
  - Teacher enables telegram block in the desired course.
  - Teacher configures the block
    Create a Telegram account (https://telegram.org or download Telegram APP in cell phone).
    Create a Telegram Private Channel.
    Take note of the channel share link. Just go into your channel and click in the channel name.
    Take note of Channel ID.
        log in web telegram
        Click on the target channel then you will find the url displayed on your browser.
        If it's a private channel then the url must be similar to:
        https://web.telegram.org/#/im?p=c1018013852_555990343349619165
        For this case, the channel ID would be 1018013852.
        It's important to know that channel's IDs are always negative and 13 characters long!
        So add -100 to it, making the correct ID -1001018013852.
 - Teacher sets the channel link in the block so that students can register.
 - Teacher adds the bot as an admin of the Private Channel.

