import React from 'react'
import Nav from '../components/Nav'
import Sidebar from '../components/Sidebar'

export default function Due() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div className="main-content">
                <section className="section">
                    <div className="section-header">
                        <h1>Pay Dues</h1>
                    </div>
                    <div className="row">
                        <div className="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4>Membership Dues</h4>
                                </div>
                                <div className="card-body">

                                    <form>
                                        <div className="card-body">
                                            <div className="form-group">
                                                <label>Full Name</label>
                                                <input type="text" className="form-control" required="" placeholder="Enter your first name and last name" />
                                            </div>
                                            <div className="form-group">
                                                <label>Email</label>
                                                <input type="email" className="form-control" required="" placeholder="Enter your email address" />
                                            </div>
                                            <div className="form-group">
                                                <label>Amount</label>
                                                <input type="number" className="form-control" placeholder="Enter amount in figures" />
                                            </div>

                                            <div className="form-group">
                                                <label for="paymentPurpose">Payment Purpose</label>
                                                <select className="form-control" id="paymentPurpose">
                                                    <option>Membership Dues</option>
                                                    <option>Donation</option>
                                                </select>
                                            </div>
                                            <div className="form-group">
                                                <label>Mobile Number</label>
                                                <input type="number" className="form-control" placeholder="Type in your Phone number" />
                                            </div>
                                        </div>
                                        <div className="card-footer text-right">
                                            <button className="btn btn-primary">Pay</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    )
}
