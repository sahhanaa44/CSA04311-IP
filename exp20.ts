class Booking {
    id: number;
    name: string;
    vehicle: string;
    type: string;
    price: number;
    status: string;

    constructor(id: number, name: string, vehicle: string, type: string, price: number, status: string) {
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

let bookings: Booking[] = [b1, b2, b3];

for (let b of bookings) {
    console.log(b.id, b.name, b.vehicle, b.type, b.price, b.status);
}

b1.status = "Approved";
console.log("Updated Status:", b1.status);