# moodle-block_telegram_forum

INSTALLATION WITH GIT

1) Go to block directory.
2) Execute "git clone https://github.com/marceloschmitt/moodle-block_telegram_forum.git telegram_forum".
3) Configure the plugin as administrator:
  - Set the Token of Telegram bot created for the organization.
  - Set the name of Telegram bot created for the organization
4) Voilá. Now each teacher that wants to integrate ther course foruns with Telegram must configure in each course:
  - Teacher enables telegram block in the desired course.
  - Teacher configures the block
    - Teacher has to create a channel in Telegram and get its ID.
    - Teacher sets the channel ID in the block
    - Teacher sets the channel link in the block so that students can register.
