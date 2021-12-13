import React from 'react'
import Nav from '../components/Nav'
import Sidebar from '../components/Sidebar'

export default function Announcement() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Announcements</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png" />
                                            <div class="media-body">
                                                <div class="media-right"><div class="text-primary">31 Oct 2021</div></div>
                                                <div class="media-title mb-1">HRH (ENGR.) Adedoyin Adelekun</div>
                                                <div class="text-info">NATIONAL PRESIDENT</div>
                                                <div class="text-primary mt-4">ILEGSOSA NATIONAL WORKING COMMITTEE MEETING</div>
                                                <div class="media-description text-muted">INVITED ADDRESS TO THE ILESA GRAMMAR SCHOOL OLD STUDENTS’ ASSOCIATION National Working Committee Saturday Oct 23rd 2021. The National President of ILEGSOSA, Dr Obi Daramola The Executive leadership of the National Executive of ILEGSOSA The members of The National Working Committee</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-outline-primary disabled">MEMO</a>
                                    <div class="float-right mt-sm-0 mt-3">
                                        <a href="#" class="btn">View Posts <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png" />
                                            <div class="media-body">
                                                <div class="media-right"><div class="text-primary">31 Oct 2021</div></div>
                                                <div class="media-title mb-1">HRH (ENGR.) Adedoyin Adelekun</div>
                                                <div class="text-info">NATIONAL PRESIDENT</div>
                                                <div class="text-primary mt-4">ILEGSOSA NATIONAL WORKING COMMITTEE MEETING</div>
                                                <div class="media-description text-muted">INVITED ADDRESS TO THE ILESA GRAMMAR SCHOOL OLD STUDENTS’ ASSOCIATION National Working Committee Saturday Oct 23rd 2021. The National President of ILEGSOSA, Dr Obi Daramola The Executive leadership of the National Executive of ILEGSOSA The members of The National Working Committee</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-outline-primary disabled">MEMO</a>
                                    <div class="float-right mt-sm-0 mt-3">
                                        <a href="#" class="btn">View Posts <i class="fas fa-chevron-right"></i></a>
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
