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
import java.net.Socket;
import java.net.ServerSocket;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.io.IOException;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.NetworkInterface;


public class Socket_agent{
	
	public static void main(String[] args){

		try{
	String adresse_serveur = args[0];
		int port = 20222;
        ServerSocket listenSock = null; //the listening server socket
        Socket sock = null;             //the socket that will actually be used for communication
  	listenSock = new ServerSocket(port);


		while(true){	

			sock = listenSock.accept();             //will block until connection recieved
	 
	 		InetAddress local = InetAddress.getLocalHost();

			String s = local.toString();
			StringTokenizer st = new StringTokenizer(s, "/"); 
							
			String nom_machine = st.nextToken(); 
			String adresse = st.nextToken();
			System.out.println(nom_machine);
			System.out.println(adresse);

			NetworkInterface ni = NetworkInterface.getByInetAddress(local);
			String allf = ni.getDisplayName();
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
			
			String calendar = day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;

			File [] roots = File.listRoots() ;

			
			for(int i=0; i<roots.length; i++){
			
				File file= new File(roots[i].toString());
				long freeSpace = file.getFreeSpace() / (1024 * 1024 * 1024);
				long totalSpace = file.getTotalSpace() / (1024 * 1024 * 1024);
				long usableSpace = file.getUsableSpace() / (1024 * 1024 * 1024);
					
				System.out.println("Disque"+file+":"+freeSpace+"Go /"+totalSpace+"Go");
				System.out.println ("Espace Utilisable:"+usableSpace);
				
				System.out.println(calendar);
	            BufferedReader br = new BufferedReader(new InputStreamReader(sock.getInputStream()));
	            BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(sock.getOutputStream()));
	            String line = "";

	            
	            

	          	  while ((line = br.readLine()) != null) {
	       
	          	      bw.write(nom_machine+"&"+adresse+"&"+add_mac+"&"+calendar+"&"+time+"&"+usableSpace+"&"+totalSpace+"&"+os+"&"+os_version+"&"+allf);
	                  bw.write("\n");
	                  bw.flush();
	          		}

	 			bw.close();
	           	br.close();
	           	sock.close();	
	       
	        	}

	 	}

	 }catch(IOException e){
	 	e.printStackTrace();
	 }

	}

}