#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h> 
const int led = 2; //pin D4 on NodeMCU board
const char* ssid = "wifiname";
const char* password = "wifipassword"; //wifipass
const char* host = "mywebsite.com"; //without https and www
const int httpsPort = 443;
const char* fingerprint = "13 9f 87 1d b1 85 be e6 bd 73 c1 8d 04 63 58 99 f0 32 43 92"; // SHA1 fingerprint HTTPS of webserver
void setup() {
 Serial.begin(115200);
 Serial.println();
 pinMode(led, OUTPUT);
 Serial.print("Connecting to wifi spot: ");
 Serial.println(ssid);
 WiFi.begin(ssid, password);
 while (WiFi.status() != WL_CONNECTED) {
 delay(500);
 Serial.print(".");
 }
 Serial.println("");
 Serial.println("WiFi connected");
 Serial.println("IP address: ");
 Serial.println(WiFi.localIP());
}
void loop() {
 WiFiClientSecure client;
 Serial.print("Connecting to ");
 Serial.println(host);
 if (!client.connect(host, httpsPort)) {
 Serial.println("connection refused/unsucess");
 return;
 }
 if (client.verify(fingerprint, host)) {
 Serial.println("certificate matches");
 } else {
 Serial.println("certifficate didnt match");
 }
String url = "/PHP/translations.txt";
 Serial.print("Request to address: ");
 Serial.println(url);
 client.print(String("GET ") + url + " HTTP/1.1\r\n" +
 "Host: " + host + "\r\n" +
 "User-Agent: NodeMCU\r\n" +
 "Connection: close\r\n\r\n");
 Serial.println("Request taken");
 while (client.connected()) {
 String line = client.readStringUntil('\n');

 if (line == "\r") {
 Serial.println("Response accepted");
 break;
 }
 }
 String line = client.readStringUntil('\n');
 Serial.println("Response variable: ");
 Serial.println("==========");
 Serial.println(line);
 if(line=="Turn on light"){
 digitalWrite(led, HIGH);
 }else if(line=="Turn off light"){
 digitalWrite(led, LOW);
 }
 }
