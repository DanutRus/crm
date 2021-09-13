# CRM
A CRM platform developed for an energy supplier, used only in intranet.
The login system is a basic one, the password isn't encrypted, it is just plain text, because the platform can be accessed only via intranet, it doesn't need any security. The reason of the login system is to track changes made by users when updating data of a client. The changes are tracked in a database table recording the id of the modified client, date when it was modified and the user who modified the client data. 

The purpose of this platform is to keep clients data in a database. Two important features of this CRM platform are that it can download pdfs based on a word template converted to HTML using information from database and it can calculate the average price of energy selling for every key account manager of the company. 
Stored data from database can also help the company to create and maintain consumption forecasts. 
Another features: 
- add a new client, based on the contract data, it depends if it is supplied only with electrical energy or natural gas or both. There are 3 options. 
- view clients
- update clients data

In the next version, the platform will have the option to generate invoices for every clients and the database will be extended to develop a cashflow statement.
