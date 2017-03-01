<?php

	$w_routes = array(
		['GET', '/', 'Default#index', 'default_index'],

        // Gestion utilisateurs
        //---------------------
        // inscription
        ['GET|POST', '/inscription/', 'Default#inscription', 'default_inscription'],
        // connexion
        ['GET|POST', '/connexion/', 'Default#connexion', 'default_connexion'],
        // déconnexion
        ['GET|POST', '/deconnexion/', 'Default#deconnexion', 'default_deconnexion'],

        // Gestion administration
        //-----------------------
        // pour accès à l'administration
        //['GET', '/admin/', 'admin#index', 'admin_index'],



	['GET', '/hash', 'Stub#hash', 'stub_hash'],

        ['GET', '/test/key',                                                    'Test#userKey', 'test_key'],
        ['GET', '/test/channels/[i:id]',                                        'Test#userChannels', 'test_channels'],
        ['GET', '/test/videos/[i:id]',                                          'Test#channelVideo', 'test_channels_videos'],
        ['GET', '/test/videos',                                                 'Test#videos', 'test_videos'],
        ['GET', '/test/search/[:search]',                                       'Test#searchVideos', 'test_search'],

        ['GET', '/stub/debug',                                                  'Stub#debug', 'stub_debug'],
        ['GET', '/stub/clear',                                                  'Stub#clear', 'stub_clear'],
        ['GET', '/stub/form/[:callback]',                                       'Stub#form', 'stub_form'],
        ['GET', '/stub/uuid/[:apiKey]',                                         'Stub#userId', 'stub_user'],
        ['GET', '/stub/channels/[:uuid]',                                       'Stub#userChannels', 'stub_user_channels'],
        ['GET', '/stub/videos/[:uuid]',                                         'Stub#channelVideos', 'stub_channel_videos'],
        ['GET', '/stub/videos/[**:tail]?',                                      'Stub#videos', 'stub_videos'],/*
        ['GET', '/stub/videos',                                                 'Stub#videos', 'stub_videos'],
        ['GET', '/stub/videos/page/[i:page]',                                   'Stub#videos', 'stub_videos_page'],
        ['GET', '/stub/videos/page/[i:page]/limit/[i:limit]',                   'Stub#videos', 'stub_videos_page_limit'],
        ['GET', '/stub/videos/limit/[i:limit]/page/[i:page]',                   'Stub#videos', 'stub_videos_limit_page'],
        ['GET', '/stub/videos/search/[s:search]',                               'Stub#videos', 'stub_search'],
        ['GET', '/stub/videos/search/[s:search]/page/[i:page]',                 'Stub#videos', 'stub_search_page'],
        ['GET', '/stub/videos/search/[s:search]/page/[i:page]/limit/[i:limit]', 'Stub#videos', 'stub_search_page_limit'],
        ['GET', '/stub/videos/search/[s:search]/limit/[i:limit]/page/[i:page]', 'Stub#videos', 'stub_search_limit_page'],*/

	);
