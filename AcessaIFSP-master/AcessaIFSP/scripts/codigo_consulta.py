# -*- coding: utf-8 -*-

#Desenvolvedor e Programador: Rodolfo Francisco de Oliveira

#Importar as bibliotecas necessarias
import serial
import time
from time import localtime, strftime
from datetime import datetime, date
import struct

#Identifica a porta serial a ser utilizada pelo sistema
porta_serial = "/dev/ttyUSB0"

#Identifica a quantidade de nós sensores na rede. 
quantidade_nos = int(raw_input('Digite a quantidade de sensores da rede:'))

#Identifica a quantidade de vezes que o algoritmo irá rodar
quantidade_vezes = int(raw_input('Digite a quantidade de repetições:'))

#Identifica o id (endereço) da base
id_base = 0

#Cria objeto para porta serial
try:
   serialPort = serial.Serial(porta_serial, 9600, timeout=0.5, parity=serial.PARITY_NONE)
except Exception:
   #Imprime mensagem de erro e encerra o programa
   print "Erro! Não foi possível abrir a porta " , porta_serial, ". Corrija o problema"
   quit()

#Cria arquivo para armazenar os dados
nome_arquivo = "../dados/dados.csv"
arquivo = open(nome_arquivo, 'a',0)

#Cria um cabeçalho no arquivo de dados
#print >>arquivo,'Iteração',';','Data / Hora',';','Nó Sensor',';','Situação',';','RSSI de Download',';','RSSI de Upload',';','Temperatura'

#Repetição principal do aplicativo
for x in range(1,quantidade_vezes+1):
   
   #Começa o procedimento para descoberta das rotas dos nós. Vai percorrer todos os nós, a principio.
   #Caso algum nó já tenha uma rota estabelecida (Cadastrada como 'S'), ele será pulado.
   for i in range(1,quantidade_nos+1):

      #Cria um pacote de 52 bytes vazio para ser enviado
      pacoteSX = {}
      for j in range(1,53):
         pacoteSX[j-1] = 0

      #Começa a configurar o pacote que será enviado.
      #Configura o byte de posição 10 (referente ao endereço de origem) com o endereço da base
      pacoteSX[10] = id_base

      #Configura o byte de posição 8 (referente ao endereço de destino) com o endereço do nó
      pacoteSX[8] = i

      #Limpa os buffers de entrada e saída da serial
      serialPort.flushInput()
      serialPort.flushOutput()

      #Transmite o pacote na serial
      for j in range(1,53):
         serialPort.write(chr(pacoteSX[j-1]))

      #Espera um tempo para que o pacote seja transmitido e recebido novamente
      time.sleep(0.4)
    
      #Le a serial em busca do pacote
      pacoteRX = serialPort.read(52)

      datahora = strftime("%d/%m/%Y - %H:%M:%S")

      #Verifica se o pacote está integro e se é um retorno de rota
      if len(pacoteRX) == 52:

         #Calculo dos RSSI de Download e Upload
         tempRSSIDownload = ord(pacoteRX[0])
         tempRSSIUpload   = ord(pacoteRX[2])
         
         
         #Calcula RSSI de Download e Upload
         if tempRSSIDownload > 128:
            rssiDownload =((tempRSSIDownload-256)/2.0)-74
         else:
            rssiDownload =(tempRSSIDownload/2.0)-74

         if tempRSSIUpload > 128:
            rssiUpload =((tempRSSIUpload-256)/2.0)-74
         else:
            rssiUpload =(tempRSSIUpload/2.0)-74



         #Leitura do AD1 - Temperatura
         ad1t = ord(pacoteRX[31]) # tipo de sensor - no caso esta medindo temperatura
         ad1h = ord(pacoteRX[32]) # alto
         ad1l = ord(pacoteRX[33]) # baixo
         temperatura = (ad1h * 256 + ad1l)/10.0



         #Grava resultado no arquivo (Ordem: Iteração, Data e Hora, 
         print >>arquivo,x,';',datahora,';',i,';','OK',';',rssiDownload,' dBm',';',rssiUpload,' dBm',';',temperatura,'ºC'
         print "Pacote recebido com sucesso! - Iteração nº ",x,'Horário: ',datahora,'NS: ',i,'RSSI de Download: ',rssiDownload,'dBm RSSI de Upload:',rssiUpload,'dBm Temperatura: ',temperatura,' Cº'
      	
      else:
         print >>arquivo,x,';',datahora,';',i,';','ERRO',';','N/A',';','N/A',';','N/A'
         print "Erro na recepçao do pacote! - Iteração nº ",x,'Horário: ',datahora,'NS: ',i
         
#Fecha arquivo
arquivo.close()

#Fecha a porta serial
serialPort.close()
