
declare function require(name: string): any;
let inputPrompt = require("prompt-sync")();

let tolls = [
    {id:101, name:"Ravi", vehicle:"TN01AB1234", location:"Chennai", amount:100, status:"Paid"},
    {id:102, name:"Priya", vehicle:"TN02CD5678", location:"Tambaram", amount:80, status:"Pending"},
    {id:103, name:"Arun", vehicle:"TN03EF9012", location:"Vellore", amount:120, status:"Paid"}
];

let choice: number;

do {
    console.log("\n1.Display  2.Add User  3.Change Amount");
    console.log("4.Update Payment  5.Search  6.Total  7.Exit");

    choice = Number(inputPrompt("Enter Choice: "));

    switch(choice) {
        case 1:
            for(let t of tolls) console.log(t);
            break;

        case 2:
            tolls.push({
                id:100+tolls.length+1,
                name:inputPrompt("Enter Name: "),
                vehicle:inputPrompt("Enter Vehicle: "),
                location:inputPrompt("Enter Location: "),
                amount:Number(inputPrompt("Enter Amount: ")),
                status:"Pending"
            });
            console.log("User Added Successfully!");
            break;

        case 3: {
            let id = Number(inputPrompt("Enter Ticket ID: "));
            let user = tolls.find(t => t.id == id);
            if(user) user.amount = Number(inputPrompt("New Amount: "));
            else console.log("Ticket Not Found!");
            break;
        }

        case 4: {
            let id = Number(inputPrompt("Enter Ticket ID: "));
            let user = tolls.find(t => t.id == id);
            if(user) user.status = "Paid";
            else console.log("Ticket Not Found!");
            break;
        }

        case 5: {
            let v = inputPrompt("Enter Vehicle Number: ");
            let user = tolls.find(t => t.vehicle == v);
            console.log(user || "Vehicle Not Found!");
            break;
        }

        case 6:
            let total = 0;
            for(let t of tolls) total += t.amount;
            console.log("Total Collection:", total);
            break;

        case 7:
            console.log("System Closed!");
            break;

        default:
            console.log("Invalid Choice!");
    }
} while(choice != 7);
