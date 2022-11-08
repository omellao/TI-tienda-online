import Crypto
from Crypto.PublicKey import RSA
from Crypto.Cipher import PKCS1_OAEP

# generación de llaves asimetricas
key = RSA.generate(2048)

# escritura de llave privada a archivo rsa
with open('rsa','wb') as f: # 'wb' abre archivo para escritura en modo binario
    f.write(key.export_key('PEM'))

# escritura de llave publica a archivo 'rsa.pub'
with open('rsa.pub', 'wb') as f:
    f.write(key.publickey().export_key())

#----------------------------------------------------

# con esto se guarda el texto la representacion en bytes
texto = b'Mensaje que se va a encriptar con la llave publica.'

# lectura de la llave publica con la que se encriptará el mensaje
publicKey = RSA.import_key(open('rsa.pub').read())

# Encriptacion del mensaje

cipherRSA = PKCS1_OAEP.new(publicKey)
textoEncriptado = cipherRSA.encrypt(texto)

# escritura del texto encriptado a un nuevo archivo
with open('encrypted_text.txt', 'wb') as f:
    f.write(textoEncriptado)

# lectura de llave privada para desencriptar el mensaje
privateKey = RSA.import_key(open('rsa').read())

# lectura del texto encriptado del archivo
textoEncriptado = open('encrypted_text.txt', 'rb').read()

# se desencripta el mensaje y se muestra en pantalla
cipherRSA = PKCS1_OAEP.new(privateKey)
plainText = cipherRSA.decrypt(textoEncriptado)
print(plainText)