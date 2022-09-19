# Improve Symfony application
## Complete following tasks:
1. Set up application
2. Populate customer data by executing Symfony console command `app:gen-data`
3. Launch application (`symfony server:start`) and verify endpoint `GET /customers`
4. Create new entity (table) Order with relation to Customer: `Order (id, customer_id, title, amount)`
5. Improve gen-data command to include order generation for each customer (customer can have 0...5 orders)
6. Clear existing data and generate new demo data (customers and orders)
7. Add API endpoint /customers/{id} which will display customer data together with associated orders.
---
**Extra**:
8. Add caching layer which would store GET /customer/{id} responses and invalidate cache on `app:gen-data` command execution. 
