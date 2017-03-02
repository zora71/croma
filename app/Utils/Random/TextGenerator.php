<?php

namespace Utils\Random;

class TextGenerator {
    public static function generatePseudo() {
        static $sujets = [
            "le lapin",
            "le shctroumpf",
            "mr",
            "le totem",
            "le shadok",
            "jojo le",
            "marcel le",
            "toto le",
            "polux le",
        ];
        static $qualificatifs = [
            "grognon",
            "chanceux",
            "heureux",
            "maladroit",
            "insouciant",
            "blanc",
            "jaune",
            "badass",
            "bolosse",
        ];
        $s = rand(0, count($sujets) - 1);
        $q = rand(0, count($qualificatifs) - 1);

        return "$sujets[$s] $qualificatifs[$q]<br>";
    }

    public static function generateTitle() {
        static $sujets = [
            'une tortue',
            'un chien',
            'un chat',
            'un arbre',
            'un homme',
            'une femme',
            'un gateau',
            'un tuyau',
            'un tonneau',
            'une bouteille',
            'un arrosoir',
            'un bateau',
            'une serviette',
            'une princesse',
            'un chevalier',
            'un dragon',
            'une vache',
            'une pintade',
        ];

        static $verbes = [
            'qui mange avec',
            'qui danse avec',
            'qui chante avec',
            'qui joue avec',
            'se pend avec',
            'tombe sur',
            'mange',
            'regarde',
            'écoute',
            'se moque d\'',
            'joue a la belotte avec',
            'joue au scrable avec',
            'joue au jeux vidéos avec',
            'regarde une vidéo avec',
        ];

        static $situations = [
            'pendant la pleine lune',
            'a l\'heure de l\'apéro',
            'sur la lune',
            'sur un lit',
            'dans un ascensseur',
            'au milieu d\' un champ de patate',
            'devant la TV'
        ];


        $s1 = rand(0, count($sujets) - 1);
        $s2 = rand(0, count($sujets) - 1);
        $v = rand(0, count($verbes) - 1);
        $s = rand(0, count($situations) - 1);

        return "$sujets[$s1] $verbes[$v] $sujets[$s2] $situations[$s]<br>";
    }
}
