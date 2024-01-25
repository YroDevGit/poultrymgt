#include <WiFi.h>

const char* ssid = "wifi ssid"; // replace nlang ng wifi SSID
const char* password = "wifi password"; // replace nlang ng wifi password

const int sensorPin = A0; // Lagay dito yung actual pin connected to the sensor

WiFiServer server(80);

void setup() {
  Serial.begin(9600);
  connectToWiFi();
  server.begin();
}

void loop() {
  WiFiClient client = server.available();
  
  if (client) {
    while (client.connected()) {

      int sensorValue = analogRead(sensorPin); // <<---- ito yung kumukuha ng value sa sensor


      client.print(sensorValue);


      delay(1000); // depende sainyo kng ilang seconds yung delay sa pag kuha ng value sa sensor: 1000 = 1sec
    }
    client.stop();
  }
}

void connectToWiFi() {
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  
  Serial.println("Connected to WiFi");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}
