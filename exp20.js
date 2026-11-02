"use strict";
class Booking {
    id;
    name;
    vehicle;
    type;
    price;
    status;
    constructor(id, name, vehicle, type, price, status) {
        this.id = id;
        this.name = name;
        this.vehicle = vehicle;
        this.type = type;
        this.price = price;
        this.status = status;
    }
}
let b1 = new Booking(101, "Ravi", "Swift", "Car", 2000, "Pending");
let b2 = new Booking(102, "Priya", "Innova", "SUV", 3500, "Approved");
let b3 = new Booking(103, "Arun", "Tata Ace", "Truck", 2500, "Pending");
let bookings = [b1, b2, b3];
for (let b of bookings) {
    console.log(b.id, b.name, b.vehicle, b.type, b.price, b.status);
}
b1.status = "Approved";
console.log("Updated Status:", b1.status);
