import smtplib
from email.mime.text import MIMEText
#import email.message
#from email.mime.multipart import MIMEMultipart
#from email.mime.text import MIMEText
#import random
#import pymysql
import mysql.connector
#from mysql.connector import Error
#import datetime



# Conexão com o banco de dados
mydb = mysql.connector.connect(
  host="localhost",
  user="site_adm",
  password="adm_site",
  database="site"
)
# Recebe os dados para conectar
mycursor = mydb.cursor()


mycursor.execute("SELECT * FROM hardware WHERE data_aviso = curdate()")
myresult = mycursor.fetchall()
for x in myresult:
    recado = ("O equipamento " + str(x[0]) + " marca " + str(x[1]) + " patrimonio " + str(x[3]) + " adquirido em " + ("{:%d/%m/%Y}".format(x[4])) + " com garantia até " + ("{:%d/%m/%Y}".format(x[5])) + " com a função de " + str(x[7]) + " está prestes a vencer a garantia."
)
    destino = str(x[8])
    destino_dois = str(x[9])
   
    

    # Criando mensagem

    # conexão com os servidores do google
    smtp_ssl_host = 'br734.hostgator.com.br'
    smtp_ssl_port = 465

    # username ou email para logar no servidor
    username = 'alerta@fritzenweb.com.br'
    password = '@lerta123'

    from_addr = 'alerta@fritzenweb.com.br'
    to_addrs = [destino, destino_dois]
   
    message = MIMEText (recado)
    message['subject'] = 'Alerta! Garantia vencendo.'
    message['from'] = from_addr
    message['to'] = ', '.join(to_addrs)
  
    # conectaremos de forma segura usando SSL
    server = smtplib.SMTP_SSL(smtp_ssl_host, smtp_ssl_port)

    # para interagir com um servidor externo precisaremos
    # fazer login nele
    server.login(username, password)
    server.sendmail(from_addr, to_addrs, message.as_string())
    server.quit()
