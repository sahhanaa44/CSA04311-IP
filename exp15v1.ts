
let tolls1 = [
    { id: 101, name: "Ravi", vehicle: "TN01AB1234", location: "Chennai", amount: 100, status: "Paid" },
    { id: 102, name: "Priya", vehicle: "TN02CD5678", location: "Tambaram", amount: 80, status: "Pending" },
    { id: 103, name: "Arun", vehicle: "TN03EF9012", location: "Vellore", amount: 120, status: "Paid" },
    { id: 104, name: "Kumar", vehicle: "TN04GH3456", location: "Kanchipuram", amount: 90, status: "Pending" }
];

// Display toll details
for (let t of tolls1) {
    console.log("ID:", t.id);
    console.log("Name:", t.name);
    console.log("Vehicle:", t.vehicle);
    console.log("Location:", t.location);
    console.log("Amount:", t.amount);
    console.log("Status:", t.status);
    console.log("----------------");
}

// Calculate total amount
let total = 0;
for (let t of tolls1) {
    total += t.amount;
}
console.log("Total Collection:", total);

// Update payment status
tolls[1].status = "Paid";
console.log("Updated Status:", tolls[1].status);

// Search vehicle
let search = "TN03EF9012";

for (let t of tolls) {
    if (t.vehicle == search) {
        console.log("Vehicle Owner:", t.name);
        console.log("Amount:", t.amount);
    }
}
