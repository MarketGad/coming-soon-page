const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const favicon = require('serve-favicon');
const path = require('path');
app.set('view engine', 'ejs');
app.use(express.static(__dirname + '/public'));
app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(bodyParser.urlencoded({extended: true}))
const mongoose = require('mongoose');
const mongo_url = 'mongodb+srv://dbProjectMotivation:dbProjectMotivation@clusterv0-1ru4b.mongodb.net/subscription?retryWrites=true&w=majority'
const session = require('express-session');
const cookieParser = require('cookie-parser');
const flash = require('connect-flash');
app.use(cookieParser());
app.use(session({
    secret: 'happydog',
    saveUninitialized: true,
    resave: true
}));
app.use(flash());

mongoose.connect(mongo_url,
{
    useNewUrlParser: true,
    useUnifiedTopology: true,
    useCreateIndex: true
}).then(console.log(`Connected to MongoDB`)).catch(err => {
    console.log(err);
});

app.get('/', (req, res) => {
    res.render('index');
});

const Schema = mongoose.Schema;
const subscriberSchema = new Schema({
    email: {
        type: String,
        required: true,
        unique: true,
        trim: true,
    }
});
const subscriber = mongoose.model('subscriber', subscriberSchema);

app.post("/save", (req, res, next) => {
    const email = req.body.email;
    if (email != undefined) {
        res.redirect('/');
        const newSubscriber = new subscriber({email});
        newSubscriber.save()
        .then(() => {})
        .catch(err => console.log(err));
    }
});

const port = 3000;
app.listen(port, () => {
    console.log(`Live at ${port}`);
});
