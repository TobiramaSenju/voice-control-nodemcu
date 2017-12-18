# Voice control for NodeMCU
Voice control for NodeMCU board with demo sketch .ino. Working with Chrome, HTTPS protocol must be on website.
Working for all microcontrolers, that can parse text file from web (or JSON).
# DONATE ME for more IoT projects
* https://www.paypal.me/Chlebovec
# Methods of input
* Click on field write text and click on submit button
* Click on microphone and speak to microphone. After you stop talking, it will auto translate via AJAX.
# Technologies in project
* backend: PHP, AJAX
* frontend: CSS, HTML, Javascript
* speech-to-text: Webkit
* NodeMCU sketch: Wiring language
* ![alt text](http://www.veramate.com/Content/images/VeraMate/voice-control.png)
# For correct use you need
* Webserver with HTTPS protocol
* Browser Chrome
* Internet connection :-)
* Arduino core for NodeMCU
# Projekt is divided to two parts in repository
* NodeMCU part - .ino file (libraries included in Arduino core)
* Server part - PHP, img, AJAX, Webkit
# Change language
* Directory PHP index.php --> recognition.lang
* English (is ready in code): recognition.lang = "en-US";
* Working with all world languages!
* For others language codes visit: https://msdn.microsoft.com/en-us/library/ms533052(v=vs.85).aspx
# Supported commands in demo code for NodeMCU and PHP directory
* turn on light
* turn off light
# Wiring
* ![alt text](https://cdn.instructables.com/F78/ZUOX/IKJ8C6U1/F78ZUOXIKJ8C6U1.MEDIUM.jpg)
# Demo video
* [link text](https://www.youtube.com/watch?v=FwcPEALti4Y "NodeMCU first test")
