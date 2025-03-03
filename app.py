from locust import HttpUser, task

class ApiUser(HttpUser):
    @task
    def get_home(self): 
        self.client.get( "/api/products" )  
    @task
    def post_data(self):
        self.client.post( "/api/products", json={"name": "value"} ) 