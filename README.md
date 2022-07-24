# Microservice
a microservice/webhook to process and return data using codeigniter v3.1.11

## inbound source data Example:
```json
{"id":1,"first_name":"Piggy","last_name":"Havoc","email":"phavoc0@meetup.com","gender":"Male","ip_address":"251.102.141.246","genres":"Comedy|Horror|Sci-Fi|Thriller","misc":"᠎"},
{"id":2,"first_name":"Marion","last_name":"Jakeway","email":"mjakeway1@tuttocitta.it","gender":"Male","ip_address":"91.132.175.211","genres":"Comedy|Documentary","misc":"() { 0; }; touch /tmp/blns.shellshock1.fail;"},
{"id":3,"first_name":"Kai","last_name":"Wolton","email":"kwolton2@exblog.jp","gender":"Female","ip_address":"17.112.23.41","genres":"Adventure|Drama|Mystery|Thriller","misc":"👩🏽"},
{"id":4,"first_name":"Janis","last_name":"Aldcorne","email":"jaldcorne3@a8.net","gender":"Female","ip_address":"251.28.36.112","genres":"Comedy|Horror","misc":"''"},
{"id":5,"first_name":"Drusie","last_name":"Melato","email":"dmelato4@apple.com","gender":"Female","ip_address":"116.219.239.177","genres":"Romance","misc":"̡͓̞ͅI̗̘̦͝n͇͇͙v̮̫ok̲̫̙͈i̖͙̭̹̠̞n̡̻̮̣̺g̲͈͙̭͙̬͎ ̰t͔̦h̞̲e̢̤ ͍̬̲͖f̴̘͕̣è͖ẹ̥̩l͖͔͚i͓͚̦͠n͖͍̗͓̳̮g͍ ̨o͚̪͡f̘̣̬ ̖̘͖̟͙̮c҉͔̫͖͓͇͖ͅh̵̤̣͚͔á̗̼͕ͅo̼̣̥s̱͈̺̖̦̻͢.̛̖̞̠̫̰"},
{"id":6,"first_name":"Belia","last_name":"Nan Carrow","email":"bnancarrow5@businessinsider.com","gender":"Female","ip_address":"108.212.52.73","genres":"Drama|Mystery","misc":"社會科學院語學研究所"},
{"id":7,"first_name":"Gabrila","last_name":"Portman","email":"gportman6@geocities.jp","gender":"Female","ip_address":"70.121.181.84","genres":"Drama|Romance","misc":"울란바토르"},
{"id":8,"first_name":"Birch","last_name":"Tremlett","email":"btremlett7@eventbrite.com","gender":"Male","ip_address":"84.7.162.62","genres":"Action|Comedy|Musical","misc":"ثم نفس سقطت وبالتحديد،, جزيرتي باستخدام أن دنو. إذ هنا؟ الستار وتنصيب كان. أهّل ايطاليا، بريطانيا-فرنسا قد أخذ. سليمان، إتفاقية بين ما, يذكر الحدود أي بعد, معاملة بولندا، الإطلاق عل إيو."},
{"id":9,"first_name":"Lotty","last_name":"Oneal","email":"loneal8@zimbio.com","gender":"Female","ip_address":"208.248.132.43","genres":"Horror|Sci-Fi","misc":"(╯°□°）╯︵ ┻━┻)  "},
{"id":10,"first_name":"Norine","last_name":"Korneichuk","email":"nkorneichuk9@ox.ac.uk","gender":"Female","ip_address":"105.193.162.119","genres":"Action|Adventure|Drama","misc":"../../../../../../../../../../../etc/hosts"},
{"id":11,"first_name":"Marigold","last_name":"Pomfrey","email":"mpomfreya@com.com","gender":"Female","ip_address":"110.133.213.147","genres":"Comedy|Romance","misc":"Z̮̞̠͙͔ͅḀ̗̞͈̻̗Ḷ͙͎̯̹̞͓G̻O̭̗̮"}]
```

to see data [click here](./MOCK_DATA.json)

## Task A:
Design a MySQL / MariaDB solution to store the data, provide the SQL insert statement for creation.

### Table Schema
![mockDataTable](mockDataTable.png)
```sql
# procedure for inserting new rows into table
USE `budgetvm` $$
CREATE procedure `InsertNewRow` (IN newID INT, IN newFirstName VARCHAR(120), IN newLastName VARCHAR(120), IN newEmail VARCHAR(120), IN newGender VARCHAR(120), IN newIpAddress VARCHAR(120), IN newGenre VARCHAR(120), IN newMisc VARCHAR(120))
BEGIN
	INSERT INTO `budgetvm`.`mock_data` (`id`, `firstName`, `lastName`, `email`, `gender`, `ipAddress`, `genres`, `misc`)
    VALUES (newID, newFirstName, newLastName, newEmail, newGender, NewIpAddress, newGenre, newMisc);
END $$
```

## Task B: 
Design a controller to process the data from a POST statement from 4.5.6.0/24 and insert it into the database. 

## Task C: 
Design a controller to return json data for *.budgetvm.com or 6.5.4.0/24 with options to filter and limit the return based on any variable

## Task D: 
Create a CRUD interface in bootstrap to manage the database solution (Ajax/jQuery optional)