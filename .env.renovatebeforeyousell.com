APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:30kBpUUSVgY+69jQhjKcxsemFbIF5rFOvwvjHBj0VZc=
APP_DEBUG=false
#APP_URL=http://52.87.85.178/lv-realestate/public/
APP_URL=https://renovatebeforeyousell.com/

LOG_CHANNEL=stack

#DB_CONNECTION=mysql
#DB_HOST=localhost
#DB_PORT=3306
#DB_DATABASE=realestate
#DB_USERNAME=root
#DB_PASSWORD=

DB_CONNECTION=mysql
DB_HOST=lv-investout.crf97jbqt1yu.us-east-1.rds.amazonaws.com
DB_PORT=3306
DB_DATABASE=lv_realestate
#DB_DATABASE=investout_latest
DB_USERNAME=admin
DB_PASSWORD=Xjp2vKq6Lp

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=newioproperty@gmail.com
MAIL_PASSWORD=Kirling#1
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=newioproperty@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

#TESTMODE
STRIPE_KEY=pk_test_Z9ohIgLO2VBISgsEpJNI0hnN
STRIPE_SECRET=sk_test_58hqaD87azNv0bMs7THM4vvk00aYuiZQIe

#LIVEMODE
#STRIPE_KEY=pk_live_CekaIvPihOUY0Z6M6USH5e3U
#STRIPE_SECRET=sk_live_L9HtMFO1lCTUpWkOc1PMHhxI00CjiesAux

STRIPE_BASE=https://api.stripe.com/
APP_CURRRENCY=$



#DOCUSIGN_BASEPATH=https://demo.docusign.net/restapi
#DOCUSIGN_ACCOUNTID=10764235
#DOCUSIGN_USERNAME=mayank.b.surati@doyenhub.com
#DOCUSIGN_PASSWORD=admin@1234
#DOCUSIGN_INTEGRATOR_KEY=0538b5de-08a1-461a-8a4c-8b1307d27a1c

DOCUSIGN_BASEPATH=https://demo.docusign.net/restapi
DOCUSIGN_ACCOUNTID=11324629
DOCUSIGN_USERNAME=tglover@investout.net
DOCUSIGN_PASSWORD=TapOne#2020
DOCUSIGN_INTEGRATOR_KEY=33e9acba-99cf-44f6-a6ec-935b43d362b6

#DUMMY ACCOUNT CAPTCHAKEYS
#RECAPTCHA_SITEKEY=6LdLi8UZAAAAAB1WUmKdpzZA1fAFrZzThbzY0jkd
#RECAPTCHA_SECRET=6LdLi8UZAAAAAFxumrRsc6HPgoRY7NNRFiwekKMG

#LIVE TYE ACCOUNT CAPTCHAKEYS
RECAPTCHA_SITEKEY=6LcVg8cZAAAAAKJLvrRrhMbWe4TvdW-Kw-fiQnJr
RECAPTCHA_SECRET=6LcVg8cZAAAAAHZbrc80Jx_-3JR8-sIrMII2abaV
