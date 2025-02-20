#include "stdio.h"
#include "limits.h"

int cash;
int car1, car2, car3, car4, car5;


int check_flag(int purchase){

	cash= cash-(purchase*90);
	if (cash > 0){
		if (purchase >= 75000*90){
			return 1;
		}
		else {

			printf("Congratulations on your purchase!!\n\n");
			return 0;
		}

	}
	else {
		printf("You don't have enough money. Also you lost pitched your money to PayPal. LOL!! !!\n\n");
		return 0;
	}
	
}

int make_purchase(int choice, int price){
	switch(choice){
		case(1): 
			if (price < 30000){
				printf("Sorry we can't go that low.\n");
				return 0;
			}
			return check_flag(price);
		case(2):
			if (price < 36000){
				printf("Sorry we can't go that low.\n");
				return 0;
			}
			return check_flag(price);
		case(3):
			if (price < 36000){
				printf("Sorry we can't go that low.\n");
				return 0;
			}
			return check_flag(price);
		case(4):
			if (price < 75000){
				printf("Sorry we can't go that low.\n");
				return 0;
			}
			return check_flag(price);
		case(5):
			if (price < 80000){
				printf("Sorry we can't go that low.\n");
				return 0;
			}
			return check_flag(price);
		default:
			printf("Invalid choice!\n");
			return 0;
	}	

}

void show_cash(int cash){
	printf("\nThe available balance is %d\n", cash);
}

void show_cars(int car1, int car2, int car3, int car4, int car5){
	printf("\n1. Mitsubishi Eclipse GT ---> %d\n\n", car1);
	printf("2. Ford Mustang GT ---> %d\n\n", car2);
	printf("3. Mitsubishi Lancer Evolution VIII ---> %d\n\n", car3);
	printf("4. Mercedes-Benz SL 500 ---> %d\n\n", car4);
	printf("5. Chevrolet Corvette C6 ---> %d\n\n", car5);
}

void win(){
	
	FILE *fptr= fopen("/home/ctf/flag.txt", "r");
	char buf[100];
	
	while(fgets(buf, sizeof(buf), fptr) != NULL){
		printf("%s", buf);
	}
	fclose(fptr);
}
int main(){
	
	cash= 40000*90;
	int check, choice, car, price;

	printf("Welcome to NFS Car lot-->\n----------------------------\n");
	printf("Note given the less availability of automobiles you can only purchase only these cars at the moment. So we give you liberty to pitch your own price as a compensation. Also as we are in India currency exchange protcols have to be followed [REFER README].\n\n");
	
	car1= 30000;
	car2= 36000;
	car3= 36000;
	car4= 75000;
	car5= 80000;

	show_cars(car1, car2, car3, car4, car5);
	printf("------------------------------------\nMenu\n\n1. Press 1 for checking your balance.\n2. Press 2 for showing cars.\n3. Press 3 for making a purchase.\n4. Press 0 for exit.\n");
	choice= 1;
		
	while(choice){
		printf("\nEnter your choice: ");	
		scanf("%d", &choice);

		switch(choice){
			case(0):
				break;				
			case(1):
				show_cash(cash);
				break;
			case(2):
				show_cars(car1, car2, car3, car4, car5);
				break;
			case(3):
				printf("Enter the car number you want to purchase: ");
				scanf("%d", &car);
				printf("Enter your expected sale price: ");
				scanf("%d", &price);

				check= make_purchase(car, price);
				if (check){
					printf("The flag is here:- \n");
					win();
				}
				break;
				
			default:
				printf("Invalid choice\n");
				break;
		}
	}	
	

	return 0;
}
