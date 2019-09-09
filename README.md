# CityPantry Test

This is the technical test for citypantry. 
For the person looking at test. Best place to start is the scenario file in /tests folder.
You will see the objects interacting in flow as described in the tech test.
You can run this project all through docker. It will automatically take care of installing phpunit and composer.

# To serve this project with docker in bash type:
sudo docker-compose build
sudo docker-compose up

# To run the unit tests on the container:
sudo docker exec -it citypantry-test_php7_1 phpunit
Most Important Tests to look at are in tests/integration/ExampleScenarioTest


# To run bash on the container:
sudo docker exec -it citypantry-test_php7_1 bash

# Please note
Due to time constraints I haven't included much comments within the code.
Also I understand more validation for input parameters could have been used.
I do not have an input file but the example scenario unit tests cover what is required.
