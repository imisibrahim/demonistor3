const TelegramBot = require('node-telegram-bot-api');

// Replace with your Telegram bot token
const bot = new TelegramBot('7946260552:AAE-gMu5qt7HpHDZW9zSLVXedF0rATugHlA', {polling: true});

// Simple /start command to handle referrals
bot.onText(/\/start(?: (.+))?/, (msg, match) => {
    const chatId = msg.chat.id;
    const referrer = match[1];  // Get the referrer ID (if any)

    if (referrer) {
        // Logic to handle referral (e.g., store referral points for the referrer)
        bot.sendMessage(chatId, `Thanks for using the referral link! Your referrer is ID: ${referrer}`);
    } else {
        // No referrer; just send a welcome message
        bot.sendMessage(chatId, "Welcome! Use your referral link to invite others.");
    }

    // Send the user's referral link
    const referralLink = `https://t.me/Saveclon_bot?start=${chatId}`;
    bot.sendMessage(chatId, `Your referral link: ${referralLink}`);
});

// Example command to check referral points
bot.onText(/\/check_rewards/, (msg) => {
    const chatId = msg.chat.id;

    // Retrieve and send the user's referral rewards (You'd store this info in a database for real use)
    bot.sendMessage(chatId, "You have 0 points from referrals.");
});
