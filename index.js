const TelegramBot = require('node-telegram-api')

const Token = '1076894751:AAHpljyg3kzTEdKOMHoEbpeZ5D6h9cm-ibw'

const bot = new TelegramBot (Token, {
	polling: true
})
bot.on('message', (msg) => {
	console.log(msg)
	bot.sendMessage(msg.chat.id, 'Здравствуйте!' + msg.from.first_name)
})
	