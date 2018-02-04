/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package lerserial;

import java.util.Enumeration;
import gnu.io.CommPortIdentifier;
import gnu.io.SerialPort;
import gnu.io.SerialPortEvent;
import gnu.io.SerialPortEventListener;

/**
 *
 * @author Sensor
 */
public class SerialCOMq {
    protected String[] portas;
    protected Enumeration listaDePortas;
 
    public SerialCOMq() {
        listaDePortas = CommPortIdentifier.getPortIdentifiers();
    }

    SerialCOMq(String coM1, int i, int i0) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
 
    public String[] ObterPortas() {
        return portas;
    }
    //Lista as portas que estão disponiveis para a comunicaçao
    protected void ListarPortas() {
        int i = 0;
        portas = new String[10];
        while (listaDePortas.hasMoreElements()) {
            CommPortIdentifier ips =
                    (CommPortIdentifier) listaDePortas.nextElement();
            portas[i] = ips.getName();
            i++;
        }
    }
    //Identifica se a porta selecionada existe e se esta funcionando
    public boolean PortaExiste(String COMp) {
        String temp;
        boolean e = false;
        while (listaDePortas.hasMoreElements()) {
            CommPortIdentifier ips = (CommPortIdentifier)listaDePortas.nextElement();
            temp = ips.getName();
            if (temp.equals(COMp) == true) {
                e = true;
            }
        }
        return e;
    }
}
    

