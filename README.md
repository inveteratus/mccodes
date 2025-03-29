# MCCodes V2

After MCCodes was made open source (See the announcement over at [MakeWebGames](https://makewebgames.io/topic/33093-mccodes-v2-open-source/)), the [public repository](https://github.com/davemacaulay/mccodesv2)
seems to have stalled with a few forks, but very little if any updates which seems rather sad. I know the contributors,
of whom there seems to be two - Dave Macaulay and Anthony AKA Orsokuma AKA Magictallguy are no doubt busy with other
projects so I thought I'd spin up a fork, and see just how easy it is to rebuild into a working project.

I'll try and document changes as I go, however note that I'm not overly interested in retaining existing mod
compatability as I feel that any mods worth writing should be done with a better code-base to start from.

Lots of things will change - crons will exist for a limited time, docker will be used to create a working development
environment, but both of these features rely on you using a linux system or at least something that can emulate one
reasonably accurately. I'll also be removing the poorly designed "cronless" crons system, the captcha's and redoing
the staff system in its entirety.

The license will probably change as well - I may keep MIT, but my intention is a full rewrite so really nothing of the
original system well be retained. It will however remain as open-source!

## Installation

```sh
git clone https://github.com/inveteratus/mccodes.git
cd mccodes
cp env.example .env
docker compose up -d
sh import.sh    # this will create the database
chmod o+w cache
```

Navigate to http://localhost:8000/ for the MCCodes game itself. You can login with the credentials:

* email - admin@example.com
* password - secret

Navigate to http://localhost:8080/ for the Adminer (MySQL admin tool) interface.

## Crons

Add to your crontab:

```sh
*   * * * * docker exec -it mccodes-app-1 php crons/1m.php
*/5 * * * * docker exec -it mccodes-app-1 php crons/5m.php
0   * * * * docker exec -it mccodes-app-1 php crons/1h.php
0   0 * * * docker exec -it mccodes-app-1 php crons/1d.php
```

## Static Analysis

Can be performed by running

```sh
vendor/bin/phpstan
```
