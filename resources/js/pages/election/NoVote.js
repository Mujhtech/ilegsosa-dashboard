import React from 'react'
import Nav from '../../components/Nav'
import Sidebar from '../../components/Sidebar'

export default function NoVote() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Cast Vote</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card">

                                <div class="card">
                                    <div class="card-header">
                                        <h4>No Elections Happening Now</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="empty-state" data-height="600">
                                            <img class="img-fluid" src="assets/img/drawkit/drawkit-nature-man-colour.svg" alt="image" />
                                            <h2 class="mt-0">Looks like no election is happening yet</h2>
                                            <p class="lead">
                                                Check back during elections season and try again.
                                            </p>
                                            <a href="#" class="btn btn-warning mt-4">Try Again</a>
                                            <a href="#" class="mt-4 bb">Contact an Admin for Help?</a>
                                        </div>
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
