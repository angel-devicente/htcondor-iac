#include <stdio.h>

int main (int argc, char *argv[])
{
  long this_number, other_number;

this_number = 1;


 while(this_number < 10000000) {
   other_number = 1;

   while(other_number < 100000) {
   if (!(this_number % 1000) && (other_number == 1)) 
     printf("%ld\n", this_number);
   other_number = other_number + 1;
   }
   this_number = this_number + 1; 
 }
 return 0;
}


