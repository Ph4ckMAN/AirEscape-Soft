from m5stack import *
from m5ui import *
from uiflow import *
from time import *


# Initialisation de l'écran avec une couleur de fond (bleu clair)
setScreenColor(0xADD8E6)

code = ""

# Boucle principale
while True:
    if len(code) == 7:
        code = ""
        setScreenColor(0x000000)
        lcd.clear()
        lcd.font(lcd.FONT_DejaVu24)
        lcd.print("ERREUR", 120, 110, 0xFF0000)  
        sleep(2)
        lcd.clear()
        setScreenColor(0xFFFFFF)  


    if btnA.wasPressed():
        lcd.font(lcd.FONT_DejaVu24)
        code += "a"
        lcd.clear()
        setScreenColor(0xFF40000)  # Rouge
        sleep(0.1)
        setScreenColor(0xFFFFFF)  # Blanc

    if btnC.wasPressed():
        lcd.font(lcd.FONT_DejaVu24)
        code += "c"
        lcd.clear()
        setScreenColor(0x00FF00)  # Vert
        sleep(0.1)
        setScreenColor(0xFFFFFF)  # Blanc

    if btnB.wasPressed():
        lcd.font(lcd.FONT_DejaVu24)
        code += "b"
        lcd.clear()
        setScreenColor(0xA4DBD6)  # Bleu
        sleep(0.1)
        setScreenColor(0xFFFFFF)  # Blanc

    print(code)
    lcd.font(lcd.FONT_DejaVu24)
    lcd.print(code, 10, 110, 0x000000)

    if code == "abacabb":  # Code correct trouvé
        break

# Lorsque le code correct est trouvé, afficher un message
setScreenColor(0x000000)  # Couleur de fond noire
lcd.font(lcd.FONT_DejaVu24)  # Définir la police
lcd.print("En cas de probleme :", 40, 100, 0x00FF00)
lcd.print("95MHz", 120, 140, 0x00FF00)
