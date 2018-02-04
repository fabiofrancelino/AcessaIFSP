/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package lerserial;

//import SrCom.SCom;  
//import SrCom.SerialCom; 
//import net.viamais.serial.SerialCOMq;
//import net.viamais.serial.SerialCOMq_wr;


/** 
 * 
 * @author petter 
 */  
public class LerSerial extends SerialCOMq {  

  
public static void main(String[] args){  
    
    
      
    //System.out.println("Passo1");
    
    SerialCOMq_wr leitura = new SerialCOMq_wr("COM7", 9600, 0);
    leitura.HabilitarLeitura();
    leitura.ObterIdDaPorta();
    leitura.AbrirPorta();
    leitura.LerDados();
            
    
    
 //Controle de tempo da leitura aberta na serial

       /* try {

            Thread.sleep(5000);
            System.out.println("Fechar Com");

        } catch (InterruptedException ex) {

            System.out.println("Erro na Thread: " + ex);

        }

        leitura.FecharCom();
*/
    }

}
    

    

