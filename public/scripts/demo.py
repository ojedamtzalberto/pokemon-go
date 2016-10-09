#!/usr/bin/python
import argparse
import logging
import time
import json

import pogo.util as util
from pogo.api import PokeAuthSession
from pogo.custom_exceptions import GeneralPogoException
from pogo.trainer import Trainer
from pogo.pokedex import *
from random import randint


# Entry point
# Start off authentication and demo
if __name__ == '__main__':
    util.setupLogger()
    logging.debug('Logger set up')

    # Read in args
    parser = argparse.ArgumentParser()
    parser.add_argument("-a", "--auth", help="Auth Service", required=True)
    parser.add_argument("-u", "--username", help="Username", required=True)
    parser.add_argument("-p", "--password", help="Password", required=True)
    parser.add_argument("-e", "--encrypt_lib", help="Encryption Library")
    parser.add_argument("-g", "--geo_key", help="GEO API Secret")
    parser.add_argument("-l", "--location", help="Location")
    parser.add_argument("-proxy", "--proxy", help="Full Path to Proxy")
    args = parser.parse_args()

    # Check service
    if args.auth not in ['ptc', 'google']:
        raise GeneralPogoException('Invalid auth service {}'.format(args.auth))

    # Set proxy
    if args.proxy:
        PokeAuthSession.setProxy(args.proxy)

    # Create PokoAuthObject
    auth_session = PokeAuthSession(
        args.username,
        args.password,
        args.auth,
        args.encrypt_lib,
        geo_key=args.geo_key,
    )

    # Authenticate with a given location
    # Location is not inherent in authentication
    # But is important to session
    if args.location:
        session = auth_session.authenticate(locationLookup=args.location)
    else:
        session = auth_session.authenticate()

    # Time to show off what we can do
    if session:
        trainer = Trainer(auth_session, session)
        pokedex = Pokedex()                

        # Wait for a second to prevent GeneralPogoException
        # Goodnight moon. Goodnight moon.
        time.sleep(1)

        # General
        trainer.getProfile()
        trainer.checkInventory()

        filename = str(trainer.session._state.profile.player_data.username) + str(randint(0,100))
        file = open('json/' + filename + '.json', 'w+')

        data = {
            'trainer': {
                'nombre': trainer.session._state.profile.player_data.username,
                'team': trainer.session._state.profile.player_data.team
            },
            'pokemon': {}    
        }

        print(filename)

        for pokemon in trainer.session.inventory.party:
            s = "\n\t{0}".format(pokemon)
            #print(str(pokemon.pokemon_id))    
            data['pokemon'][pokemon.id] = {'cp': pokemon.cp, 
                                     'id': pokemon.pokemon_id,
                                     'pokemon_id': pokemon.id,
                                     'individual_attack': pokemon.individual_attack,
                                     'individual_defense': pokemon.individual_defense,
                                     'individual_stamina': pokemon.individual_stamina,
                                     'cp_multiplier': pokemon.cp_multiplier }

        json.dump(data, file)
        file.close()
        #for algo in trainer.session.inventory:
        #    print(algo)

    else:
        logging.critical('Session not created successfully')