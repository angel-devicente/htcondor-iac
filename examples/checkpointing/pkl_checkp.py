#!/usr/bin/env python

import pickle
import os
import time

def increment_and_save():
    # Check if the pickle file exists
    if os.path.exists("counter.pkl"):
        # Load the previous state from the pickle file
        with open("counter.pkl", "rb") as f:
            counter = pickle.load(f)
            with open("pkl.output", "a") as file:
                print(f"\nRestarting from pickle at counter value: {counter}\n", file=file)
    else:
        # Start from 1 if no previous state is found
        counter = 1
        
    try:
        while counter < 100:
            with open("pkl.output", "a") as file:
                print(f"Calculated: {counter}", file=file)

            # Save the state every 10 increments
            if counter % 10 == 0:
                with open("counter.pkl", "wb") as f:
                    pickle.dump(counter, f)

            # Simulate computation time
            time.sleep(1)  # Wait for 10 seconds                    
            counter += 1
        os.remove("counter.pkl")
    except KeyboardInterrupt:
        print("Program terminated by user.")

if __name__ == "__main__":
    increment_and_save()

    
