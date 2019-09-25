#!/bin/bash
PHPSTORM_VERSION="2019.2"
echo Php version is = $PHPSTORM_VERSION
cd ".PhpStorm"$PHPSTORM_VERSION
rm -rf config/eval
rm config/options/options.xml
rm config/options/other.xml
rm -rf ~/.java/.userPrefs/jetbrains
#rm -rf phpstorm
