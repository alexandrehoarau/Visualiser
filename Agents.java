//Author : HOARAU Alexandre 

import java.util.StringTokenizer;
import java.io.IOException;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.InetAddress;
import java.net.URL;
import java.net.URLConnection;
import java.io.OutputStreamWriter;
import java.io.OutputStream;
import java.net.NetworkInterface;
import java.lang.StringBuffer;
import java.math.BigInteger;
import java.util.Date;
import java.lang.Thread;
import java.lang.InterruptedException;
import java.util.Calendar;
import java.lang.Runtime;
import java.lang.System;
import java.io.File;
import java.util.Arrays;
import java.lang.Thread;

public class Agents{

	public static void main(String[] args){

		String adresse_serveur = args[0];
		while(true){
		try{
			InetAddress local = InetAddress.getLocalHost();

			String s = local.toString();
			StringTokenizer st = new StringTokenizer(s, "/"); 
								
			String nom_machine = st.nextToken(); 
			String adresse = st.nextToken();
			System.out.println(nom_machine);
			System.out.println(adresse);

			NetworkInterface ni = NetworkInterface.getByInetAddress(local);
			byte[] mac = ni.getHardwareAddress();
			BigInteger bi = new BigInteger(mac);


			String hex2 = bi.toString(16).toUpperCase();
			System.out.println(hex2);
			String sub1 = hex2.substring(0,2);
			String sub2 = hex2.substring(2,4);
			String sub3 = hex2.substring(4,6);
			String sub4 = hex2.substring(6,8);
			String sub5 = hex2.substring(8,10);
			String sub6 = hex2.substring(10,12);
			String add_mac = sub1+":"+sub2+":"+sub3+":"+sub4+":"+sub5+":"+sub6;
			System.out.println(add_mac);
			//for (int i = 0; i < mac.length; i++) {	
			// 	System.out.format("%02X%s", mac[i], (i < mac.length - 1) ? "-" : "");
							 		
			//    }
			
			//	String to_send_data = URLEncoder.encode("nom" , "UTF-8")+
			//						  "="+URLEncoder.encode(nom_machine, "UTF-8");
			//	to_send_data += URLEncoder.encode("adresse", "UTF-8")+
			//					  "="+URLEncoder.encode(adresse, "UTF-8");
			
			URL url = null;
			
			url = new URL("http://"+adresse_serveur+"/IC4/home.php");
			
								
			//monUrl.openConnection c'est un URLConnection mais on fait un cast en HttpURLConnection pour
			//pouvoir communiquer avec le proc Http et utiliser les méthodes liées ( Code retour / Message)
			
			HttpURLConnection connection= (HttpURLConnection) url.openConnection();
			
			connection.setDoOutput(true); // Pour pouvoir envoyer des données
			connection.setRequestMethod("POST");
								
			
			
									
			Calendar cal = Calendar.getInstance();
			int year = cal.get(Calendar.YEAR);
			int month = cal.get(Calendar.MONTH)+1;
			int day = cal.get(Calendar.DAY_OF_MONTH);
			int hour = cal.get(Calendar.HOUR_OF_DAY);
			int minute = cal.get(Calendar.MINUTE);
			int second = cal.get(Calendar.SECOND);
			
			Date date = new Date();
			long time = date.getTime();
			
			System.out.println(time);
			
			String os = System.getProperty("os.name").toString();
			String os_version = System.getProperty("os.version").toString();
			System.out.println(os);
			System.out.println(os_version);
			
			File [] roots = File.listRoots() ;
			
			for(int i=0; i<roots.length; i++){
			
				File file= new File(roots[i].toString());
				long freeSpace = file.getFreeSpace() / (1024 * 1024 * 1024);
				long totalSpace = file.getTotalSpace() / (1024 * 1024 * 1024);
				long usableSpace = file.getUsableSpace() / (1024 * 1024 * 1024);
				
				System.out.println("Disque"+file+":"+freeSpace+"Go /"+totalSpace+"Go");
				System.out.println ("Espace Utilisable:"+usableSpace);
								
			
				String calendar = day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;
			
				System.out.println(calendar);
			
				OutputStreamWriter writer = new OutputStreamWriter(connection.getOutputStream());
				writer.write("nom="+nom_machine+"&adresse="+adresse+"&addmac="+add_mac+"&calendrier="+calendar+"&time="+time+"&espace_utilisable="+usableSpace+"&total_espace="+totalSpace);
				writer.flush();
				System.out.println("Code Retour : " +connection.getResponseCode());
			
				System.out.println("Message :" + connection.getResponseMessage());
				
				Thread.sleep(15000);						
			
			}

			}catch (IOException e1) {   
			e1.printStackTrace();
										 
			}catch(InterruptedException e2){
			e2.printStackTrace();
			}
					
		}
	}
}