let tolls = [
    { id: 101, name: "Ravi", vehicle: "TN01AB1234", location: "Chennai", amount: 100, status: "Paid" },
    { id: 102, name: "Priya", vehicle: "TN02CD5678", location: "Tambaram", amount: 80, status: "Pending" },
    { id: 103, name: "Arun", vehicle: "TN03EF9012", location: "Vellore", amount: 120, status: "Paid" }
];

for (let t of tolls) {
    console.log("Ticket ID:", t.id);
    console.log("User Name:", t.name);
    console.log("Vehicle:", t.vehicle);
    console.log("Toll Location:", t.location);
    console.log("Amount:", t.amount);
    console.log("Status:", t.status);
    console.log("----------------");
}

tolls[1].status = "Paid";
console.log("Updated Status:", tolls[1].status);