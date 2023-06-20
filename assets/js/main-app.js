/**
 * Main Javascript functions
 */

// initialization properties
let form = {
    title: "Writer's Choice",
    academic_level_id: 2,
    subject_id: 1,
    service_type_id: 1,
    deadline: 336,
    pages: 1,
    slides: 0,
    sources: 1,
    instructions: '',
    referencing_style_id: 1,
    spacing_id: 1,
    writer_category_id: 1,
    discount_id: '',
    currency_id: 2,
    language_id: 1, extra: '',
    files: [],
    amount: 9.99,
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
}

let rates = [
    {
        "id": 1,
        "name": "3 hours",
        "hours": 3,
        "amount": "35.00"
    },
    {
        "id": 2,
        "name": "6 hours",
        "hours": 6,
        "amount": "33.00"
    },
    {
        "id": 3,
        "name": "12 hours",
        "hours": 12,
        "amount": "31.50"
    },
    {
        "id": 4,
        "name": "18 hours",
        "hours": 18,
        "amount": "29.99"
    },
    {
        "id": 5,
        "name": "24 hours",
        "hours": 24,
        "amount": "28.00"
    },
    {
        "id": 10,
        "name": "2 days",
        "hours": 48,
        "amount": "22.50"
    },
    {
        "id": 11,
        "name": "7 days",
        "hours": 168,
        "amount": "18.00"
    },
    {
        "id": 12,
        "name": "10 days",
        "hours": 240,
        "amount": "16.50"
    },
    {
        "id": 13,
        "name": "14 days",
        "hours": 336,
        "amount": "14.00"
    },
    {
        "id": 14,
        "name": "30 days",
        "hours": 720,
        "amount": "10.00"
    }
];
let services = [
    {
        "id": 1,
        "name": "Essay Writing Service",
        "rate": 0
    },
    {
        "id": 2,
        "name": "Coursework",
        "rate": 0
    },
    {
        "id": 3,
        "name": "Term Paper Writing",
        "rate": 0
    },
    {
        "id": 4,
        "name": "Research Paper",
        "rate": 0
    },
    {
        "id": 5,
        "name": "Power Point Presentation",
        "rate": -20
    },
    {
        "id": 6,
        "name": "Discussion Post Writing",
        "rate": 0
    },
    {
        "id": 7,
        "name": "Discussion Board Response",
        "rate": 0
    },
    {
        "id": 8,
        "name": "Discussion Board",
        "rate": 0
    },
    {
        "id": 9,
        "name": "Classwork",
        "rate": 0
    },
    {
        "id": 10,
        "name": "Annotated Bibliography",
        "rate": 0
    },
    {
        "id": 11,
        "name": "Report Writing",
        "rate": 10
    },
    {
        "id": 12,
        "name": "Capstone Project",
        "rate": 0
    },
    {
        "id": 13,
        "name": "Admission Essay",
        "rate": 0
    },
    {
        "id": 14,
        "name": "Personal Statement",
        "rate": 0
    },
    {
        "id": 15,
        "name": "College Essay",
        "rate": 0
    },
    {
        "id": 16,
        "name": "Speech Writing",
        "rate": 0
    },
    {
        "id": 17,
        "name": "Book Review",
        "rate": 0
    },
    {
        "id": 18,
        "name": "Movie Review",
        "rate": 0
    },
    {
        "id": 19,
        "name": "Article Review/Critique",
        "rate": 0
    },
    {
        "id": 20,
        "name": "Thesis Writing",
        "rate": 10
    },
    {
        "id": 21,
        "name": "Dissertation Writing Service",
        "rate": 15
    },
    {
        "id": 22,
        "name": "Dissertation - CHAPTER 1 Writing",
        "rate": 0
    },
    {
        "id": 23,
        "name": "Dissertation - CHAPTER 2 Literature Review Writing",
        "rate": 5
    },
    {
        "id": 24,
        "name": "Dissertation - CHAPTER 3 Methodology",
        "rate": 0
    },
    {
        "id": 25,
        "name": "Dissertation - CHAPTER 4 Results",
        "rate": 5
    },
    {
        "id": 26,
        "name": "Dissertation - CHAPTER 5 Discussion",
        "rate": 5
    },
    {
        "id": 27,
        "name": "Case Study Writing",
        "rate": 5
    },
    {
        "id": 28,
        "name": "Create Brochure",
        "rate": 0
    }
];
let levels = [
    {
        "id": 6,
        "name": "Personal",
        "rate": 5
    },
    {
        "id": 7,
        "name": "Professional",
        "rate": 15
    },
    {
        "id": 1,
        "name": "High School",
        "rate": 0
    },
    {
        "id": 2,
        "name": "College",
        "rate": 0
    },
    {
        "id": 3,
        "name": "Undergraduate/University",
        "rate": 10
    },
    {
        "id": 4,
        "name": "Masters",
        "rate": 20
    },
    {
        "id": 5,
        "name": "Ph.D.",
        "rate": 30
    }
];

let baseRate = 0.00;
let levelRate = 0.00;
let serviceRate = 0.00;

console.log('rates[3]: '+rates[3].amount);


function getPrice() {
    console.log("beginning of getPrice: ")
    console.log("form.deadline " + form.deadline) // logs 186

    baseRate = rates.find(rate => rate.hours === parseInt(form.deadline));
    console.log("baseRate: "+baseRate); // logs undefined

    let total = parseInt(baseRate.amount) ?? 0;
    console.log("Type of total: "+typeof(total));
    console.log("Total: "+total);

    levelRate = levels.find(level => level.id === parseInt(form.academic_level_id)).rate ?? 0;
    console.log("levelRate: "+levelRate);

    serviceRate = services.find( service => service.id === parseInt(form.service_type_id) ).rate ?? 0;
    console.log("serviceRate: "+serviceRate);

    let rateTotal = total + total*(levelRate/100) + total*(serviceRate/100);

    console.log('rateTotal - type: '+ typeof(rateTotal))

    let slides = parseInt(form.slides);

    total = (rateTotal * parseInt(form.pages)) + (rateTotal * slides);

    form.amount = (Math.round(total * 100)/ 100).toFixed(2);
    console.log("amount in getPrice: "+ form.amount)
}

function setInits() {
    form.service_type_id = parseInt(jQuery('#service_type').val());
    console.log('# service_type' + form.service_type_id);

    form.academic_level_id = parseInt(jQuery('#academic_level').val());
    form.deadline = parseInt(jQuery('#deadline').val());
    form.pages = parseInt(jQuery('#pages').val());

    getPrice();

    (function ($) {
        let newPrice = form.amount; // Set the new price value
        console.log('price in lastline in setInits(): ' + newPrice);

        document.getElementById('price').innerHTML = newPrice;
        // $( '#price' ).text(newPrice); // Update the text content of the element with ID "price"
}) (jQuery)
}

function updatePrice() {
    jQuery(document).ready(function () {
        let newPrice = form.amount; // Set the new price value
        console.log('price in updatePrice(): '+ newPrice);

        jQuery("#amount").html(`<b>${newPrice}</b>`); // Update the text content of the element with ID "price"
    });
}

// save subform's order to localStorage before redirecting to the full order form
function saveSubForm() {
    setInits();
    localStorage.setItem('newOrder', JSON.stringify(form));
    window.location.href='/orders/new';
}
