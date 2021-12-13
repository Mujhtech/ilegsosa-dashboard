import React from 'react'
import Nav from '../components/Nav'
import Sidebar from '../components/Sidebar'
import { Link } from "react-router-dom";

export default function Home() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div className="main-content">
                <section className="section">
                    <div className="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div className="row">
                        <div className="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4>Quick Actions</h4>
                                </div>
                                <div className="card-body">
                                    <div className="row">
                                        <div className="col-12 col-lg-12">
                                            <div className="wizard-steps">
                                                <div className="wizard-step wizard-step-active">
                                                    <Link to="/connect-with-mates"><div className="wizard-step-icon">
                                                        <i className="fas fa-mobile-alt"></i>
                                                    </div>
                                                        <div className="wizard-step-label">
                                                            Connect with Mates
                                                        </div></Link>
                                                </div>
                                                <div className="wizard-step wizard-step-active">
                                                    <Link to="/pay-due"><div className="wizard-step-icon">
                                                        <i className="fas fa-receipt"></i>
                                                    </div>
                                                        <div className="wizard-step-label">
                                                            Pay Dues
                                                        </div></Link>
                                                </div>
                                                <div className="wizard-step wizard-step-active">
                                                    <Link to="/profile"><div className="wizard-step-icon">
                                                        <i className="fas fa-id-card"></i>
                                                    </div>
                                                        <div className="wizard-step-label">
                                                            Update Profile
                                                        </div></Link>
                                                </div>
                                                <div className="wizard-step wizard-step-active">
                                                    <Link href="/vote"><div className="wizard-step-icon">
                                                        <i className="fas fa-vote-yea"></i>
                                                    </div>
                                                        <div className="wizard-step-label">
                                                            Cast Vote
                                                        </div></Link>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4>Announcements</h4>
                                </div>
                                <div className="card-body">
                                    <div className="list-group">
                                        <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                            <div className="d-flex w-100 justify-content-between">
                                                <h5 className="mb-1">ILEGRAMS 86TH ANNIVERSARY</h5>
                                            </div>
                                            <p className="mb-1">Ilegrams Old Students' Association Secretariat, Canon J. A. Akinyemi Building, Ilesa Grammar School, P.O.Box 16, Ilesa, Osun State, Nigeria.</p>
                                            <small className="text-muted">29th November 2021.</small>
                                        </a>
                                        <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                            <div className="d-flex w-100 justify-content-between">
                                                <h5 className="mb-1">ILEGRAMS 86TH ANNIVERSARY</h5>
                                            </div>
                                            <p className="mb-1">Ilegrams Old Students' Association Secretariat, Canon J. A. Akinyemi Building, Ilesa Grammar School, P.O.Box 16, Ilesa, Osun State, Nigeria.</p>
                                            <small className="text-muted">29th November 2021.</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4>Due Payment Report</h4>
                                    <div className="card-header-action">
                                        <a href="#" className="btn btn-primary">View All</a>
                                    </div>
                                </div>
                                <div className="card-body p-0">
                                    <div className="table-responsive">
                                        <table className="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Transaction</th>
                                                    <th>Transaction Type</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>October 2021 Due</td>
                                                    <td>Online Payment</td>
                                                    <td>Oct 17, 2021</td>
                                                    <td>
                                                        <a className="btn btn-info">&#x20A6;5,500.00</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>November 2021 Due</td>
                                                    <td>Online Payment</td>
                                                    <td>Oct 17, 2021</td>
                                                    <td>
                                                        <a className="btn btn-info">&#x20A6;5,500.00</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>December 2021 Due</td>
                                                    <td>Online Payment</td>
                                                    <td>Oct 17, 2021</td>
                                                    <td>
                                                        <a className="btn btn-info">&#x20A6;5,500.00</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>January 2022 Due</td>
                                                    <td>Online Payment</td>
                                                    <td>Oct 17, 2021</td>
                                                    <td>
                                                        <a className="btn btn-info">&#x20A6;5,500.00</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>February 2022 Due</td>
                                                    <td>Online Payment</td>
                                                    <td>Oct 17, 2021</td>
                                                    <td>
                                                        <a className="btn btn-info">&#x20A6;5,500.00</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    )
}
