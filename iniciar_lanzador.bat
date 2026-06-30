@echo off
:: Título para identificar el proceso si es necesario
title Lanzador Kiosco Toponimos


:: Lanzar Edge en modo Kiosco apuntando al servidor local
:: La bandera --restore-last-session evita que Edge pregunte si quieres restaurar pestañas tras un apagado repentino
start "" "C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe" --kiosk "http://localhost/toponimos" --edge-kiosk-type=fullscreen --no-first-run --restore-last-session
