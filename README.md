ขั้นตอนการทำ https://www.thaicreate.com/php/php-websockets-real-time.html

ระบบแชท php websocket + mysql
Configต่างๆ src Connection.php

    1.สร้างฐานข้อมูลและ config การเชื่อมต่อฐานข้อมูล mysql ที่ Connection.php 

รัน serrver websocket ที่ cmd Directory bin ให้ลองรัน php --version ดูหากรันไม่ได้ให้ไปเพิ่ม external command in command prompt 
สำหรับ window คลิกขวาที่ My Computer->properties -> Advanced system setting เลือก Environment Variables.. Add path ที่เก็บ php.exe ไว้
แล้วให้รีสตาร์ท cmd หรือ vscode
https://stackoverflow.com/questions/31291317/php-is-not-recognized-as-an-internal-or-external-command-in-command-prompt

    2.รันคำสั่ง cd bin แล้วรัน php chat-server.php เพื่อ start server websocket


    3.เข้าใช้งาน http://localhost/Chat-php-websocket/

หากรันแล้วใช้งานไม่ได้ดูที่ไฟล์ index.php post.php ว่า path server ให้เปลี่ยนเป็น localhost ทั้งหมด


