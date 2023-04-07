# HealthOnKill

https://github.com/MINTEDCLICKS/HealthOnKill

made by minty#4097. sets health to max upon kill.

you can change it to add health upon kill by changing $killer->setHealth($killer->getMaxHealth) to $killer->setHealth($killer->getHealth()+INSERTNUMBERHERE) in Main.php line 27

there is a 1 tick delay before setting health in order to ensure compatibility with plugins that fetch player health upon kill such as https://github.com/MINTEDCLICKS/PvPKillMessages
