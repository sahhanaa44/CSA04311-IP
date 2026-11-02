"use strict";
let c1 = {
    id: 101, farmer: "Ravi", animal: "Cow",
    disease: "Fever", status: "Pending"
};
let c2 = {
    id: 102, farmer: "Priya", animal: "Dog",
    disease: "Skin Infection", status: "Pending"
};
let c3 = {
    id: 103, farmer: "Arun", animal: "Goat",
    disease: "Cold", status: "Resolved"
};
let complaints = [c1, c2, c3];
console.log("All Complaints:", complaints);
c1.status = "Resolved";
console.log("Updated Complaint:", c1);
